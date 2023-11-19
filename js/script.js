
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
    
    // adicionando infos no painel
    alimentoItem.querySelector('a').addEventListener('click', (e)=>{
        e.preventDefault(); // bloqueando ação natural de recarregar página
        let key = e.target.closest('.food-item').getAttribute('data-key');
        infoAreaQt = 1;
        infoAreaKey = key;

        // preenchendo infos no painel
        c('.foodBig img').src = alimentosJson[key].img;
        c('.foodInfo h1').innerHTML = alimentosJson[key].name;
        c('.foodInfo--desc').innerHTML = alimentosJson[key].description;
        c('.foodInfo--actualPrice').innerHTML = `R$ ${alimentosJson[key].price.toFixed(2)}`;
        ca('.foodInfo--size').forEach((size, sizeIndex) => {
            if(sizeIndex == 2){
                size.classList.add('selected');
            }
            size.querySelector('span').innerHTML = alimentosJson[key].sizes[sizeIndex];
        });

        c('.foodInfo--qt').innerHTML = infoAreaQt;
        
        // mostrando painel de info
        c('.foodWindowArea').style.opacity = 0;
        c('.foodWindowArea').style.display = 'flex';
        setTimeout(()=>{
            c('.foodWindowArea').style.opacity = 1;
        }, 200);
    });
    
    c('.food-area').append(alimentoItem)
});

// função p/ fechar o painel de infos
function closeFoodInfo () {
    c('.foodWindowArea').style.opacity = 0;
    setTimeout(()=>{
        c('.foodWindowArea').style.display = 'none';
    }, 500);
} 

function closeCartArea () {
    c('.cart--area').style.opacity = 0;
    setTimeout(()=>{
        c('.cart--area').style.display = 'none';
    }, 500);
} 

// saindo do painel de infos
ca('.foodInfo--cancelButton, .foodInfo--cancelMobileButton').forEach((item)=>{
    item.addEventListener('click', closeFoodInfo);
});

ca('.cart--finalizar, .cart--finalizarMobileButton').forEach((item)=>{
    item.addEventListener('click', closeCartArea);
}); 
    
c('.alimentoInfo--incrementa').addEventListener('click', ()=>{
    infoAreaQt++;
    c('.foodInfo--qt').innerHTML = infoAreaQt;
});

// mudando o size dos alimentos
ca('.foodInfo--size').forEach((size, sizeIndex)=>{
    size.addEventListener('click', (e)=>{
        c('.foodInfo--size.selected').classList.remove('selected');
        size.classList.add('selected');
    });
});


// Função que redireciona o produto para uma nova página
function redirecionar() {
  // Obter o produto do carrinho
  let produto = document.querySelector(".cart").textContent;
  // Verificar se o produto não está vazio
  if (produto) {
    // Criar um parâmetro de consulta com o produto
    let query = "?produto=" + produto;
    // Redirecionar para a nova página com o parâmetro
    window.location.href = "pedido.html" + query;
  } else {
    // Mostrar uma mensagem de erro se o produto estiver vazio
    alert("O carrinho está vazio!");
  }
}
