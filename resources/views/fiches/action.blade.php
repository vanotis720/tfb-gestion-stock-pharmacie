@if (auth()->user()->role == 'admin')
    @if ($fiche->status == 'admin')
        <a href="{{ route('fiche.edit', $fiche->id) }}"
            class="btn btn-round btn-success float-right">
            Envoyer a la caisse
            <i class="nc-icon nc-money-coins"></i>
        </a>
        <a href="{{ route('fiche.action', ['id' => $fiche->id, 'action' => 'rejected']) }}"
            class="btn btn-round btn-danger float-right">
            Rejeter
            <i class="nc-icon nc-simple-remove"></i>
        </a>
    @elseif ($fiche->status == 'solved')
        <a href="{{ route('fiche.action', ['id' => $fiche->id, 'action' => 'validated']) }}"
            class="btn btn-round btn-success float-right">
            Confirmer et envoyer en stock
            <i class="nc-icon nc-box-2"></i>
        </a>
    @endif
@endif
@if (auth()->user()->role == 'caisse')
    @if ($fiche->status == 'caisse')
        <a href="{{ route('fiche.action', ['id' => $fiche->id, 'action' => 'pharmacist']) }}"
            class="btn btn-round btn-success float-right">
            Autoriser l'achat
            <i class="nc-icon nc-delivery-fast"></i>
        </a>
    @endif
@endif
@if (auth()->user()->role == 'pharmacist')
    @if ($fiche->status == 'pharmacist')
        <a href="{{ route('fiche.action', ['id' => $fiche->id, 'action' => 'solved']) }}"
            class="btn btn-round btn-success float-right">
            Confirmer l'achat
            <i class="nc-icon nc-check-2"></i>
        </a>
    @endif
@endif
