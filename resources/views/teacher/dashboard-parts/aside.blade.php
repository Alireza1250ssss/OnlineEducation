<aside>
        <div class="titles">
            <h3>Dashboard</h3>
            <a href="/logout">Log Out <i class='fas fa-reply'></i></a>
        </div>
        <ul>
            <li class="main" onclick="show('notifications')">Notifications 
                <span class="text-white d-inline-block rounded px-2 bg-dark">{{auth()->user()->unreadNotifications->count()}}</span>
            </li>

            <li class="title">Courses</li>
            <li class="d-none">
                <ul>
                    <li onclick="show('courses-list')">manage courses</li>
                </ul>
            </li>

        </ul>
    </aside>