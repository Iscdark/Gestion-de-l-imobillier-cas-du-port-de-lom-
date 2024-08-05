<div class="header">
    <div class="user-info d-flex align-items-center">
        <i class="fa-regular fa-user"></i> <!-- Icône de l'utilisateur -->
        <span class="user-name ml-2">
            @if(Auth::guard('admin')->user()->role === 'admin')
                {{ Auth::guard('admin')->user()->name }}
            @elseif(Auth::guard('Dg')->user()->role  === 'Dg')
                {{ Auth::guard('Dg')->user()->name  }}
            @elseif(Auth::guard('service')->user()->role  === 'service')
                {{ Auth::guard('service')->user()->name  }}
            @else
                {{ Auth::user()->name ?? 'Guest' }}
            @endif
        </span>
    </div>
</div>
