
<form action=<?php echo "/mp/storeUpdate/".$params['mp']['id']; ?> method="post" class="col-11 col-sm-9 col-md-7 col-lg-5 mx-auto border bg-light p-4 mt-4">
    <h2><?= $params['title'] ?></h2>
    <div class="mb-3">
        <label for="num_mp" class="form-label">Num MP</label>
        <input type="number" class="form-control" name="num_mp" id="num_mp" aria-describedby="helpId" 
        value = "<?= $params['mp']['num_mp'] ?>"/>

    </div>
    <div class="mb-3">
        <label for="nom_mp" class="form-label">Nom MP</label>
        <input type="text" class="form-control" name="nom_mp" id="nom_mp" aria-describedby="helpId" 
        value = "<?=$params['mp']['nom_mp'] ?>"/>
        <input type="hidden" value = "<?=$params['mp']['id'] ?>"/>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</form>