<div class="boards">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="board">
                <i class="fa fa-school fa-fw"></i>
                <div>
                    <p>اجمالي الجامعات</p>
                    <span>
                        {{ DB::table('universities')->count() }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="board">
                <i class="fa fa-tags fa-fw"></i>
                <div>
                    <p>اجمالي الاقسام</p>
                    <span>
                        {{ DB::table('sections')->count() }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="board">
                <i class="fa fa-graduation-cap fa-fw"></i>
                <div>
                    <p>اجمالي المجموعات</p>
                    <span>
                        {{ DB::table('groups')->count() }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="board">
                <i class="fa fa-graduation-cap fa-fw"></i>
                <div>
                    <p>اجمالي الطلاب</p>
                    <span>
                        {{ DB::table('students')->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>