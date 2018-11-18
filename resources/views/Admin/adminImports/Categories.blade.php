<div class="container-fluid"
    id="admin-navbar-sticky">
    <nav style="background:white !important; padding-top: 20px !important;">
        <div class="nav nav-tabs"
            role="tablist"
            id="nav-tab">
            <a class="nav-item nav-link active"
                id="nav-home-tab"
                data-toggle="tab"
                href="#nav-home"
                role="tab"
                aria-controls="nav-home"
                aria-selected="true"
                style="padding-left: 50px !important; padding-right: 50px !important; margin-left: 150px;"
                onmouseover="visibleMinipanels(this)">
                Категории <span class="badge badge-primary badge-pill">{{ count($categories) }}</span>
            </a>
            <a class="nav-item nav-link"
                id="nav-profile-tab"
                data-toggle="tab"
                href="#nav-profile"
                role="tab"
                aria-controls="nav-profile"
                aria-selected="false"
                style="padding-left: 50px !important; padding-right: 50px !important;"
                onmouseover="visibleMinipanels(this)">
                Создать новую <i class="fa fa-plus"></i>
            </a>
            <a class="nav-item nav-link"
                id="nav-contact-tab"
                data-toggle="tab"
                href="#nav-contact"
                role="tab"
                aria-controls="nav-contact"
                aria-selected="false"
                style="padding-left: 50px !important; padding-right: 50px !important;"
                onmouseover="visibleMinipanels(this)">Корзина <i class="fa fa-trash-o"></i></a>
        </div>
    </nav>
</div>

<br><br><br>

<div class="tab-content"
    id="nav-tabContent">

    @include('Admin.adminImports.AdminCategoriesImports.categoriesList')
    @include('Admin.adminImports.AdminCategoriesImports.createNewCategorie')
    @include('Admin.adminImports.AdminCategoriesImports.trashCategories')

</div>