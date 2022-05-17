document.getElementById("log_button").addEventListener("click", (e) => { 
    
})



document.getElementById("change_reg").addEventListener("click", (e) => { 
    e.preventDefault()
    document.getElementById("logIn_form").style.display = "none"
    document.getElementById("reg_form").style.display = "flex";
    document.getElementById("log_form").style.display = "none";
})

