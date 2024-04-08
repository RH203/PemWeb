document.getElementById("formKu").addEventListener("submit", function (e) {
  let usernameNode = document.getElementById("username");
  let usernameSpanNode = document.getElementById("usernameSpan");

  let emailNode = document.getElementById("email");
  let emailSpanNode = document.getElementById("emailSpan");

  let passwordNode = document.getElementById("pass");
  let passwordSpanNode = document.getElementById("passSpan");

  let noTelephoneNode = document.getElementById("telephone");
  let noTelephoneSpanNode = document.getElementById("telephoneSpan");

  let genderNodes = document.querySelectorAll('input[name="gender"]');
  let genderSpanNode = document.getElementById("genderSpan");

  let urlNode = document.getElementById("url");
  let urlSpanNode = document.getElementById("urlSpan");

  let isValid = true;

  // Validate username
  let usernameError = "";
  if (usernameNode.value.trim() === "") {
    usernameError = "Username harus diisi";
  } else if (/\W/.test(usernameNode.value.trim())) {
    usernameError = "Hanya bisa diisi karakter alfanumerik";
  } else if (usernameNode.value.trim().length < 6) {
    usernameError = "Username minimal 6 karakter";
  }

  if (usernameError !== "") {
    usernameSpanNode.innerHTML = usernameError;
    usernameSpanNode.className = "error";
    usernameNode.style.border = "2px solid red";
    isValid = false;
  } else {
    usernameSpanNode.innerHTML = "";
    usernameNode.style.border = "";
  }

  // Validate email
  let emailError = "";
  if (emailNode.value.trim() === "") {
    emailError = "Email harus diisi";
  } else if (!/^[\w-]+(\.[\w-]+)*@gmail\.com$/.test(emailNode.value.trim())) {
    emailError = "Email harus merupakan alamat Gmail";
  }

  if (emailError !== "") {
    emailSpanNode.innerHTML = emailError;
    emailSpanNode.className = "error";
    emailNode.style.border = "2px solid red";
    isValid = false;
  } else {
    emailSpanNode.innerHTML = "";
    emailNode.style.border = "";
  }

  // Validate password
  let passwordError = "";
  if (passwordNode.value.trim() === "") {
    passwordError = "Username harus diisi";
  } else if (/\W/.test(passwordNode.value.trim())) {
    passwordError = "Hanya bisa diisi karakter alfanumerik";
  } else if (passwordNode.value.trim().length < 6) {
    passwordError = "Username minimal 6 karakter";
  }

  if (passwordError !== "") {
    passwordSpanNode.innerHTML = passwordError;
    passwordSpanNode.className = "error";
    passwordNode.style.border = "2px solid red";
    isValid = false;
  } else {
    passwordSpanNode.innerHTML = "";
    passwordNode.style.border = "";
  }

  // Validate telephone
  let telephoneError = "";
  if (noTelephoneNode.value.trim() === "") {
    telephoneError = "Username harus diisi";
  } else if (/\W/.test(noTelephoneNode.value.trim())) {
    telephoneError = "Hanya bisa diisi karakter alfanumerik";
  } else if (noTelephoneNode.value.trim().length < 6) {
    telephoneError = "Username minimal 6 karakter";
  }

  if (telephoneError !== "") {
    noTelephoneSpanNode.innerHTML = telephoneError;
    noTelephoneSpanNode.className = "error";
    noTelephoneNode.style.border = "2px solid red";
    isValid = false;
  } else {
    noTelephoneSpanNode.innerHTML = "";
    noTelephoneNode.style.border = "";
  }

  // Validate gender
  let isGenderSelected = false;
  genderNodes.forEach(function (node) {
    if (node.checked) {
      isGenderSelected = true;
    }
  });

  if (!isGenderSelected) {
    genderSpanNode.textContent = "Please select a gender";
    isValid = false;
  } else {
    genderSpanNode.textContent = "";
  }

  // Validate URL
  let urlError = "";
  if (urlNode.value.trim() === "") {
    urlError = "URL harus diisi";
  } else if (!/^(ftp|http|https):\/\/[^ "]+$/.test(urlNode.value.trim())) {
    urlError = "URL tidak valid";
  }

  if (urlError !== "") {
    urlSpanNode.innerHTML = urlError;
    urlSpanNode.className = "error";
    urlNode.style.border = "2px solid red";
    isValid = false;
  } else {
    urlSpanNode.innerHTML = "";
    urlNode.style.border = "";
  }

  console.log(isValid);
  // Final check
  if (isValid) {
    console.log("Form submitted successfully!");
  } else {
    e.preventDefault();
  }
});
