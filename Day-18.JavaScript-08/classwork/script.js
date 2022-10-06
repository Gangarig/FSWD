const flowers = [
    {name:"Alstroemeria",
    Image:"Alstroemeria.jpg",
    price:35,
    qtty:0,
    },   
    {name:"Daisy",
    Image:"Daisy.jpg",
    price:20,
    qtty:0,
    },
    {name:"Calla Lily",
    Image:"Calla Lily.jpg",
    price:15,
    qtty:0,
    },
    {name:"Sunflower",
    Image:"Sunflower.jpg",
    price:10,
    qtty:0,
    },{
    name:"Rose",
    Image:"Rose.jpg",
    price:25,
    qtty:0,
    },{
    name:"Carnation",
    Image:"Carnation.jpg",
    price:35,
    qtty:0,
    },
];
//current object formatter
const currencyFormater = new Intl.NumberFormat("de-AT", {
    style: "currency",
    currency: "EUR",
  });
// select the products and output in order
let flowerarray = document.querySelector(".products");
for (let flower of flowers){
    flowerarray.innerHTML +=`
    <div class="card product m-5 col-auto my-2" style="width: 300px;">
    <img class="card-img-top mt-2 px-3" src="./Images/${flower.Image}" alt="product1">
    <div class="card-body px-3 py-0">
        <h5 class="card-title">${flower.name}</h5>
        <p class="card-text p-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, libero.</p>
        <p class="card-text h3 text-end">${currencyFormater.format(flower.price)}</p>
        <p class="card-text3 d-flex justify-content-end"><button class="btn  w-75 product-button"><i
                    class="fs-4 bi bi-cart-plus"></i> Add to cart</button></p>
   
    </div>
    `;
};
const basket = [];
// prduct button selected
const addToCart = document.querySelectorAll(".product-button");

addToCart.forEach((btn,i) => {
    btn.addEventListener("click",() => {
        addToCart(flowers[i]);
    });
});

const addToCart = (flower) => {
    if(flower.find(()))
}
  