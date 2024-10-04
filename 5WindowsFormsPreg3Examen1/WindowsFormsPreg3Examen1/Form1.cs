using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace WindowsFormsPreg3Examen1
{
    public partial class Form1 : Form
    {
        DataSet ds = new DataSet();

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            datos();
            dataGridView1.EditMode = DataGridViewEditMode.EditOnKeystrokeOrF2; // Permitir edición
            dataGridView1.CellValidating += new DataGridViewCellValidatingEventHandler(dataGridView1_CellValidating);
            dataGridView1.CellEndEdit += new DataGridViewCellEventHandler(dataGridView1_CellEndEdit);

            // Vinculamos el evento CellClick para actualizar los TextBox 4, 5, 6 al hacer clic en una fila
            dataGridView1.CellClick += new DataGridViewCellEventHandler(dataGridView1_CellClick);
        }

        private void datos()
        {
            using (SqlConnection con = new SqlConnection("server=(local)\\SQLEXPRESS;database=bdroberto;Integrated Security=True;"))
            {
                SqlDataAdapter ada = new SqlDataAdapter("SELECT * FROM persona", con);
                ada.Fill(ds, "persona");
            }
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "persona"; // Asegúrate de que el DataSource se establezca aquí
        }

        private void button1_Click(object sender, EventArgs e)
        {
            datos(); // Actualiza la vista
        }

        private void button4_Click(object sender, EventArgs e)
        {
            string nombre = textBox2.Text;
            string paterno = textBox3.Text;
            int ci;
            if (!int.TryParse(textBox1.Text, out ci))
            {
                MessageBox.Show("Por favor, introduce una edad válida.");
                return;
            }
            using (SqlConnection con = new SqlConnection("server=(local)\\SQLEXPRESS;database=bdroberto;Integrated Security=True;"))
            {
                con.Open();
                string query = "INSERT INTO persona (ci, nombre, paterno) VALUES (@ci, @nombre, @paterno)";

                using (SqlCommand cmd = new SqlCommand(query, con))
                {
                    // Añade los parámetros al comando
                    cmd.Parameters.AddWithValue("@Nombre", nombre);
                    cmd.Parameters.AddWithValue("@paterno", paterno);
                    cmd.Parameters.AddWithValue("@ci", ci);
                    try
                    {
                        cmd.ExecuteNonQuery();
                        MessageBox.Show("Persona añadida correctamente.");
                        ds.Clear();
                        datos();
                        dataGridView1.DataSource = ds;
                        dataGridView1.DataMember = "persona";
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Error al añadir persona: " + ex.Message);
                    }
                }
            }

        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            // Verifica si la fila seleccionada es válida y que no sea un encabezado
            if (e.RowIndex >= 0 && dataGridView1.Rows[e.RowIndex].DataBoundItem is DataRowView row)
            {
                // Carga los datos en los TextBox 4, 5 y 6 para eliminar o visualizar
                textBox4.Text = row["ci"].ToString();
                textBox5.Text = row["nombre"].ToString();
                textBox6.Text = row["paterno"].ToString();
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            if (string.IsNullOrEmpty(textBox4.Text))
            {
                MessageBox.Show("Por favor, selecciona una persona para eliminar.");
                return;
            }

            int ci;
            if (!int.TryParse(textBox4.Text, out ci))
            {
                MessageBox.Show("Por favor, introduce un CI válido.");
                return;
            }

            using (SqlConnection con = new SqlConnection("server=(local)\\SQLEXPRESS;database=bdroberto;Integrated Security=True;"))
            {
                con.Open();
                string query = "DELETE FROM persona WHERE ci = @ci";

                using (SqlCommand cmd = new SqlCommand(query, con))
                {
                    cmd.Parameters.AddWithValue("@ci", ci);

                    try
                    {
                        int rowsAffected = cmd.ExecuteNonQuery();
                        if (rowsAffected > 0)
                        {
                            MessageBox.Show("Persona eliminada correctamente.");
                            ds.Clear();  // Limpia el dataset antes de recargar los datos
                            datos(); // Recarga los datos
                            LimpiarTextBoxes(); // Limpia los TextBox 4, 5, y 6 después de eliminar
                        }
                        else
                        {
                            MessageBox.Show("No se encontró una persona con ese CI.");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Error al eliminar persona: " + ex.Message);
                    }
                }
            }
        }

        private void dataGridView1_CellValidating(object sender, DataGridViewCellValidatingEventArgs e)
        {
            // Asegúrate de que la columna sea la que deseas editar
            if (e.ColumnIndex == 1 || e.ColumnIndex == 2) // Suponiendo que 1 es 'nombre' y 2 es 'paterno'
            {
                // Verifica si el valor ingresado es válido
                if (string.IsNullOrEmpty(e.FormattedValue.ToString()))
                {
                    MessageBox.Show("El campo no puede estar vacío.");
                    e.Cancel = true; // Cancela la edición
                }
            }
        }

        private void dataGridView1_CellEndEdit(object sender, DataGridViewCellEventArgs e)
        {
            // Solo actualizar la base de datos si la columna es editable
            if (e.ColumnIndex == 1 || e.ColumnIndex == 2) // Suponiendo que 1 es 'nombre' y 2 es 'paterno'
            {
                // Obtiene el nuevo valor y el CI de la fila
                string newValue = dataGridView1.Rows[e.RowIndex].Cells[e.ColumnIndex].Value.ToString();
                int ci = (int)dataGridView1.Rows[e.RowIndex].Cells[0].Value; // Suponiendo que la columna 0 es 'ci'

                // Actualiza en la base de datos
                using (SqlConnection con = new SqlConnection("server=(local)\\SQLEXPRESS;database=bdroberto;Integrated Security=True;"))
                {
                    con.Open();
                    string query = "UPDATE persona SET " + (e.ColumnIndex == 1 ? "nombre" : "paterno") + " = @newValue WHERE ci = @ci";

                    using (SqlCommand cmd = new SqlCommand(query, con))
                    {
                        cmd.Parameters.AddWithValue("@newValue", newValue);
                        cmd.Parameters.AddWithValue("@ci", ci);

                        try
                        {
                            cmd.ExecuteNonQuery();
                            MessageBox.Show("Datos actualizados correctamente.");
                        }
                        catch (Exception ex)
                        {
                            MessageBox.Show("Error al actualizar persona: " + ex.Message);
                        }
                    }
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            // Crea una instancia de Form2
            Form2 form2 = new Form2();

            // Muestra el formulario como un cuadro de diálogo modal
            form2.ShowDialog();
        }
        private void LimpiarTextBoxes()
        {
            textBox4.Text = "";
            textBox5.Text = "";
            textBox6.Text = "";
        }
    }
}