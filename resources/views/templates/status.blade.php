@if ($fiche->status == 'admin')
    <h6>
        <span class="badge badge-warning"> En attente de
            l'administrateur</span>
    </h6>
@elseif ($fiche->status == 'caisse')
    <h6>
        <span class="badge badge-warning"> En attente de la caisse</span>
    </h6>
@elseif ($fiche->status == 'pharmacist')
    <h6>
        <span class="badge badge-warning"> En attente du pharmacien</span>
    </h6>
@elseif ($fiche->status == 'solved')
    <h6>
        <span class="badge badge-info"> Acheter, en attende de
            validation</span>
    </h6>
@elseif ($fiche->status == 'validated')
    <h6>
        <span class="badge badge-success"> En stock</span>
    </h6>
@elseif ($fiche->status == 'rejected')
    <h6>
        <span class="badge badge-danger"> Demande refuser</span>
    </h6>
@endif
