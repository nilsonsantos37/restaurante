
// funções para facilitar o query selector
const c = (el) =>document.querySelector(el);
const ca = (el) =>document.querySelectorAll(el);

let infoAreaKey = 0 // referencia do alimento na array
let cartPedido = [];
// listagem das foods
alimentosJson.map((item, index)=>{
    // atribuindo infos dos alimentos na página inicial
    let alimentoItem = c('.models .food-item').cloneNode(true);
    
    alimentoItem.setAttribute('data-key', index);

    alimentoItem.querySelector('.food-item--img img').src = item.img;
    alimentoItem.querySelector('.food-item--name').innerHTML = item.name;
    alimentoItem.querySelector('.food-item--desc').innerHTML = item.description;
    alimentoItem.querySelector('.food-item--desc').innerHTML = item.description;
    alimentoItem.querySelector('.food-item--price').innerHTML = `R$ ${item.price.toFixed(2)}`;
   
    c('.food-area').append(alimentoItem)
});
