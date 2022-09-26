{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('appel') }}"><i class="nav-icon la la-question"></i> Appels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('categorie-appel') }}"><i class="nav-icon la la-question"></i> Categorie appels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('client') }}"><i class="nav-icon la la-question"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('compte-client') }}"><i class="nav-icon la la-question"></i> Compte clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('achat-parution') }}"><i class="nav-icon la la-question"></i> Achat parutions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('parution') }}"><i class="nav-icon la la-question"></i> Parutions</a></li>