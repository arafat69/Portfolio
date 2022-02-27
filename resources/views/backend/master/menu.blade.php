<div class="sidebar-menu">
    <ul class="menu">
        <li class='sidebar-title'>Main Menu</li>

        <li class="sidebar-item @if($page=='dashboard') active @endif">
            <a href="{{ route('home') }}" class='sidebar-link'>
                <i class="bi bi-speedometer2" width="20"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item @if($page=='portfolio') active @endif">
            <a href="{{ route('portfolio') }}" class='sidebar-link'>
                <i class="bi bi-card-list" width="20"></i>
                <span>Portfolio</span>
            </a>
        </li>

        <li class="sidebar-item @if($page=='skill') active @endif">
            <a href="{{ route('skill') }}" class='sidebar-link'>
                <i class="bi bi-lightning-charge" width="20"></i>
                <span>Skill</span>
            </a>
        </li>

        <li class="sidebar-item @if($page=='social') active @endif">
            <a href="{{ route('social') }}" class='sidebar-link'>
                <i class="bi bi-line" width="20"></i>
                <span>Social Link</span>
            </a>
        </li>

        <li class="sidebar-item @if($page=='user') active @endif">
            <a href="{{ route('user') }}" class='sidebar-link'>
                <i class="bi bi-people" width="20"></i>
                <span>users</span>
            </a>
        </li>

    </ul>
</div>
