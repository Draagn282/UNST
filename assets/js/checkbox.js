const loginform = document.querySelector("#loginform");

loginform.addEventListener("submit", (e) => {
  e.preventDefault();

  const inputname = document.getElementById("name");
  const inputpass = document.getElementById("pass");

  let errors = 0;

  // name
  if (inputname.value == "") {
    inputname.style.border = "solid 5px var(--red)";
    errors++;
  } else {
    inputname.style.border = "solid 5px var(--lightgreen)";
  }

  //   pass
  if (inputpass.value == "") {
    inputpass.style.border = "solid 5px var(--red)";
    errors++;
  } else {
    inputpass.style.border = "solid 5px var(--lightgreen)";
  }

  if (!errors) {
    loginform.submit();
  } else {
    alert("Vul de resterende velden in");
  }
});

const registerform = document.querySelector("#registerform");

registerform.addEventListener("submit", (e) => {
  e.preventDefault();

  const inputnewname = document.getElementById("newname");
  const inputnewemail = document.getElementById("newemail");
  const inputnewpass = document.getElementById("newpass");

  let errors = 0;

  // name
  if (inputnewname.value == "") {
    inputnewname.style.border = "solid 5px var(--red)";
    errors++;
  } else {
    inputnewname.style.border = "solid 5px var(--lightgreen)";
  }

  //   email
  if (inputnewemail.value == "") {
    inputnewemail.style.border = "solid 5px var(--red)";
    errors++;
  } else {
    inputnewemail.style.border = "solid 5px var(--lightgreen)";
  }
  //   pass
  if (inputnewpass.value == "") {
    inputnewpass.style.border = "solid 5px var(--red)";
    errors++;
  } else {
    inputnewpass.style.border = "solid 5px var(--lightgreen)";
  }

  if (!errors) {
    registerform.submit();
  } else {
    alert("Vul de resterende velden in");
  }
});
