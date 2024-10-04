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

namespace WindowsFormsPreg3Examen1
{
    public partial class Form2 : Form
    {
        DataSet ds = new DataSet();
        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            datos();
        }

        private void datos()
        {
            using (SqlConnection con = new SqlConnection("server=(local)\\SQLEXPRESS;database=bdroberto;Integrated Security=True;"))
            {
                SqlDataAdapter ada = new SqlDataAdapter("SELECT * FROM catastro", con);
                ada.Fill(ds, "catastro");
            }
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "catastro"; // Asegúrate de que el DataSource se establezca aquí
        }
    }
}
