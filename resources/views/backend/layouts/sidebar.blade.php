<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('backend.dashboard') }}" class="ai-icon " aria-expanded="false">
                    <i class="icon-speedometer"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('*students*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.students.index') }}" class="ai-icon " aria-expanded="false">
                    <i class="icon-people icons"></i>
                    <span class="nav-text">Alunos</span>
                </a>
            </li>
            <li class="{{ Request::is('*units*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.units.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home-2"></i>
                    <span class="nav-text">Polos</span>
                </a>
            </li>
            <li class="{{ Request::is('*classes*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.classes.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="las la-user-graduate"></i>
                    <span class="nav-text">Turmas</span>
                </a>
            </li>
            <li class="{{ Request::is('*programs*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.programs.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="las la-certificate"></i>
                    <span class="nav-text">Programas</span>
                </a>
            </li>
            <li class="{{ Request::is('*researches*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.researches.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="las la-chalkboard-teacher"></i>
                    <span class="nav-text">Pesquisas</span>
                </a>
            </li>
            @if (Auth::guard('web')->user()->hasRole(['admin']))
                <li class="{{ Request::is('*schools*') ? 'mm-active' : '' }}">
                    <a href="{{ route('backend.schools.index') }}" class="ai-icon" aria-expanded="false">
                        <i class="las la-school"></i>
                        <span class="nav-text">Escolas</span>
                    </a>
                </li>
            @endif
            <li class="{{ Request::is('*annotations*') ? 'mm-active' : '' }}">
                <a href="{{ route('backend.annotations.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="icon-notebook icons"></i>
                    <span class="nav-text"> {!! \Lang::choice('tables.annotations', 'p') !!}</span>
                </a>
            </li>
            @if (Auth::guard('web')->user()->hasRole(['admin']))
                <li
                    class="{{ (Request::is('*slides*') or Request::is('*actions*') or Request::is('*testimonials*') or Request::is('*abouts*') or Request::is('*action-lines*') or Request::is('*partners*') or Request::is('*teams*') or Request::is('*reports*') or Request::is('*definitions*')) ? 'mm-active' : '' }}">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="las la-laptop-code"></i>
                        <span class="nav-text">Site</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('backend.frontend.slides.index') }}">Slides</a></li>
                        <li><a href="{{ route('backend.frontend.actions.index') }}">Ações</a></li>
                        <li><a href="{{ route('backend.frontend.testimonials.index') }}">Depoimentos</a></li>
                        <li><a href="{{ route('backend.frontend.abouts.show') }}">Sobre o IDC</a></li>
                        <li><a href="{{ route('backend.frontend.action-lines.index') }}">Linhas de Ações</a></li>
                        <li><a href="{{ route('backend.frontend.partners.index') }}">Parceiros</a></li>
                        <li><a href="{{ route('backend.frontend.teams.index') }}">Equipe</a></li>
                        <li><a href="{{ route('backend.frontend.reports.index') }}">Relatórios Anuais</a></li>
                        <li><a href="{{ route('backend.frontend.newsletter.index') }}">Newsletter</a></li>
                        <li>
                            <a href="{{ route('backend.frontend.posts-instagram.index') }}">Posts do Instagram</a>
                        </li>
                        <li><a href="{{ route('backend.frontend.definitions.show') }}">Definições do Site</a></li>

                    </ul>
                </li>

                <li
                    class="{{ (Request::is('*countries*') or Request::is('*states*') or Request::is('*cities*') or Request::is('*sexes*') or Request::is('*users*') or Request::is('*group-users*') or Request::is('*offices*')) ? 'mm-active' : '' }}">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Configurações</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('backend.countries.index') }}">Países</a></li>
                        <li><a href="{{ route('backend.states.index') }}">Estados</a></li>
                        <li><a href="{{ route('backend.cities.index') }}">Cidades</a></li>
                        <li><a href="{{ route('backend.sexes.index') }}">Sexos</a></li>
                        <li><a href="{{ route('backend.offices.index') }}">Cargos</a></li>
                        <li><a href="{{ route('backend.group.users.index') }}">Grupo de Usuários & Permissões</a>
                        <li><a href="{{ route('backend.users.index') }}">Usuários</a></li>
                    </ul>
                </li>
            @endif
            <li class="mt-4">
                <a target="_blank" href="{{ route('frontend.home') }}" class="ai-icon text-light bg-success"
                    aria-expanded="false">
                    <i class="fa fa-star-o "></i>
                    <span class="nav-text"> Acessar Site</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p>Powered by <a href="//codeall.app" target="_blank">CodeAll</a> <span class="heart"></span>
                Desenvolvidopor <a href="//harmonysis.com.br/" target="_blank">Harmony Sistemas</a>
            </p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
