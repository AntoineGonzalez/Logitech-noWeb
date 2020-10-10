
function filter_function() {
  // Declare variables
  console.log("function");
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('namefilter');
  filter = input.value.toUpperCase();
  sections = document.getElementsByClassName('annonces');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < sections.length; i++) {
    a = sections[i].getElementsByTagName("h1")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      sections[i].style.display = "";
    } else {
      sections[i].style.display = "none";
    }
  }
}
