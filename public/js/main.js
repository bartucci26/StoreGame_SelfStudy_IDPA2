function rebindActions() {
    var deletes = document.getElementsByClassName('deletecart');
    if (deletes.length > 0) {
        console.log(deletes);
        for (i = 0; i < deletes.length; i++) {
            deletes.item(i).addEventListener("click", deleteCart);
        }
    }

    var buttons = document.getElementsByClassName('addcart');
    if (buttons.length > 0) {
        console.log(buttons);
        for (i = 0; i < buttons.length; i++) {
            buttons.item(i).addEventListener("click", addCart);
        }
    }


}

function addCart() {
    var parent = this.parentElement;
    var cart = document.getElementById("cart");

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../public/cart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        cart.innerHTML = xhr.responseText;
        rebindActions(); // call the function that rebinds the listener for add or delete
      }
      console.log(xhr.readyState);
    };

    xhr.send("add_id=" + parent.id);
  }
function deleteCart() {
    var parent = this.parentElement;
    var cart = document.getElementById("cart");

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../public/cart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        cart.innerHTML = xhr.responseText;
        rebindActions(); // call the function that rebinds the listener for add or delete
      }
      console.log(xhr.readyState);
    };

    xhr.send("delete_id=" + parent.id);
  }


window.onload = function () {
    filterType();
}
function filterType() {
    var type_select = document.getElementById("type_select");
    var game_overview = document.getElementById("game_overview");

    var type_id = type_select.options[type_select.selectedIndex].value;
    var url = '../public/games.php?type_id=' + type_id;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            game_overview.innerHTML = xhr.responseText;
            rebindActions();
        }
    }
    xhr.send();
}

var type_select = document.getElementById("type_select");
type_select.addEventListener("change", filterType);
