// Call the dataTables jQuery plugin
$(document).ready(function() {
  cargarUsuarios();
  $('#dataTableUsuarios').DataTable();
});

async function cargarUsuarios(){
    const request = await fetch("usuarios", {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    });

    const usuarios = await request.json();
    console.log(usuarios);

    let usuarioHTML = '<tr><td>123</td><td>Prueba X Adolfo</td><td>De la Rosa</td><td>666778899</td><td>adolfodelarosa@gmail.com</td><td>12345</td><td><a href="#" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td></tr>';
    document.querySelector('#dataTableUsuarios tbody').outerHTML = usuarioHTML;

}
