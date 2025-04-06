const Products = 
[
    {
        id:1,
        name: 'Paquete Tursitico a Bahia Inglesa',
        price: '40.000',
        description: 'alimnetacion y transporte',
        image: '/static/img/card1.jpg'
    },
    {
        id:2,
        name: 'Paquete de viaje a Valparaiso',
        price: '150.000',
        description: '14 dias y 15 noches',
        image: '/static/img/card2.jpg'
    },
    {
        id:3,
        name: 'Paquete de viaje a Castro',
        price: '200.000',
        description: '20 dias y 19 noches',
        image: '/static/img/card3.jpg'
    },
]

const root = document.querySelector('#root');
const cart = []

const loadEvents = () =>
{
    const buttons = document.querySelectorAll('.button')
    for (const button of buttons) 
    {
        button.addEventListener('click', ()=> {
            const selectedProduct = Products.find(product => product.id === Number(button.id))
            if(selectedProduct){
                alert(`Se agregÃ³ al carrito el producto: ${selectedProduct.name}`)
                cart.push(selectedProduct)
            }
        })    
    }
}

const createProducts = () =>
{
    Products.forEach(product => {
        const card = document.createElement('div')
        card.innerHTML = `
            <img src='${product.image}' alt='${product.description}'>
            <h3>$${product.price}</h3>
            <h4>${product.description}</h4>
            <button id='${product.id}' class='button'>Agregar al carrito</button>
        `
        root.appendChild(card)
    });
    loadEvents()
}

createProducts()