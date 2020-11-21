            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Dashboard</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Today
                                                    Revenue</span>
                                                <h2 class="mb-0">$2189</h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-revenue-chart" class="apex-charts"></div>
                                                <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 10.21%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Product
                                                    Sold</span>
                                                <h2 class="mb-0">1065</h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-product-sold-chart" class="apex-charts"></div>
                                                <span class="text-danger font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-down'></i> 5.05%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                                    Customers</span>
                                                <h2 class="mb-0">11</h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-new-customer-chart" class="apex-charts"></div>
                                                <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 25.16%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                                    Visitors</span>
                                                <h2 class="mb-0">750</h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-new-visitors-chart" class="apex-charts"></div>
                                                <span class="text-danger font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-down'></i> 5.05%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0">Input Types</h4>
                                        <p class="sub-header">
                                            Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="simpleinput">Text</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput"
                                                                value="Some text value...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-email">Email</label>
                                                        <div class="col-lg-10">
                                                            <input type="email" id="example-email" name="example-email"
                                                                class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-password">Password</label>
                                                        <div class="col-lg-10">
                                                            <input type="password" class="form-control"
                                                                id="example-password" value="password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-placeholder">Placeholder</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control"
                                                                placeholder="placeholder" id="example-placeholder">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-textarea">Text area</label>
                                                        <div class="col-lg-10">
                                                            <textarea class="form-control" rows="5"
                                                                id="example-textarea"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Readonly</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" readonly=""
                                                                value="Readonly value">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Disabled</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" disabled=""
                                                                value="Disabled value">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-static">Static control</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" readonly class="form-control-plaintext"
                                                                id="example-static" value="email@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-helping">Helping text</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="example-helping"
                                                                placeholder="Helping text">
                                                            <span class="help-block"><small>A block of help text that
                                                                    breaks onto a new line and may extend beyond one
                                                                    line.</small></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Input Select</label>
                                                        <div class="col-lg-10">
                                                            <select class="form-control custom-select">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-fileinput">Default file input</label>
                                                        <div class="col-lg-10">
                                                            <input type="file" class="form-control"
                                                                id="example-fileinput">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-date">Date</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-date" type="date"
                                                                name="date">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-month">Month</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-month" type="month"
                                                                name="month">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-time">Time</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-time" type="time"
                                                                name="time">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-week">Week</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-week" type="week"
                                                                name="week">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-number">Number</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-number"
                                                                type="number" name="number">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">URL</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" type="url" name="url">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Search</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" type="search" name="search">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Tel</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" type="tel" name="tel">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-color">Color</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" id="example-color" type="color"
                                                                name="color" value="#5369f8">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <label class="col-lg-2 col-form-label"
                                                            for="example-range">Range</label>
                                                        <div class="col-lg-10">
                                                            <input class="custom-range mt-1" id="example-range"
                                                                type="range" name="range" min="0" max="10">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                        </div>
                    </div>
                </div> <!-- content -->

                
