const menuItems = ['Tandoori Paneer Tikka',
    'Malai Paneer Tikka',
    'Soya Tandoori Tikka',
    'Tandoori Aloo	',
    'Punjabi Soya Chap',
    'Hare-Bhare Kabab',
    'Dahi ke Kabab	',
    'Platter'];

function displaymenulist() {
    const menuList = document.createElement('ul');

    for (let i = 0; i < menuItems.length; i++) {
        const menuItem = document.createElement('li');
        menuItem.textContent = menuItems[i];
        menuList.appendChild(menuItem);
    }
    document.body.appendChild(menuList);

}


var item = document.getElementById('R_NAMRE').onclick();
alert(item);

function menuList() {
    displaymenulist();
}

