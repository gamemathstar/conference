<aside class="ps-lg-4">
    <div class="widget widget-category">
        <div class="widget__header">
            <h5>Menu</h5>
        </div>
        <ul class="lab-ul widget-wrapper list-bg-none">
            <li><a href="{{route('submissions.without.review')}}">Conf. Submissions (WR)</a></li>
            <li><a href="{{route('submissions.without.review.journal')}}">Journal Submissions (WR)</a></li>
            <li><a href="{{route('submissions.without.review',['cnf'=>'Colloquium'])}}">Colq. Submissions (WR)</a></li>
            <li>
                <a href="{{route('submissions.myReviews')}}">My Reviews(CNF) </a>
            </li>
            <li>
                <a href="{{route('submissions.myReviews',['cnf'=>'Colloquium'])}}">My Reviews(CLQ) </a>
            </li>
            <li>
                <a href="{{route('submissions.myReviews.journal')}}">My Reviews(JRN)</a>
            </li>
            <li><a href="{{ route("users.index") }}">Users</a></li>
        </ul>
    </div>
</aside>
