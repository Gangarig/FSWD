<div class='card mb-3 w-100 bg-secondary text-light' style='max-width: 700px;'>
        <div class='row g-0'>
            <div class='col-md-4'>
                <img src='pictures/'".$row['picture']." class='img-fluid rounded-start' >
            </div>
        <div class='col-md-8'>
            <div class='card-body h-100 pt-5'>
                <h5 class='card-title'>".$row['name']."</h5>
                <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p>".$row['price']."</p>
                <div class='pt-5 w-100 d-flex justify-content-end'>
                <a href='update.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Edit</button></a>
                <a href='update.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Details</button></a>
                <a href='delete.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Delete</button></a>
                </div>
            </div>
        </div>
        </div>
</div>   