<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Categories</span>
    </a>
    <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories</h6>
            {{--            <a class="collapse-item" href="{{route('user.create')}}">Create a user</a>--}}
            <a class="collapse-item" href="{{route('categories.index')}}">View all Categories</a>
{{--            <a class="collapse-item" href="{{route('user.create')}}"></a>--}}
        </div>
    </div>
</li>