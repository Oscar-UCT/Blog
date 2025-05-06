const logoutBtn = document.getElementById("logout-btn");

document.getElementById("header-usuario").addEventListener("click", ()=>
{
    if (logoutBtn.style.display == "flex")
    {
        OcultarCerrarSesión()
    }
    else
    {
        MostrarCerrarSesión()
    }
})

function MostrarCerrarSesión()
{
    logoutBtn.style.display = "flex";
}
function OcultarCerrarSesión()
{
    logoutBtn.style.display = "none";
}