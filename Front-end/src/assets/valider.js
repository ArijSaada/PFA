function valider()
{
    pwd = document.querySelector("#pwd_participant").value;
    verif = document.querySelector("#verif_pwd").value;
    if (pwd == verif)
    {return true}

else { alert ("wrong pwd ");return (false)}
} 