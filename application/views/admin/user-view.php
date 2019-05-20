<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="tables-section">
	    <div class="outer-w3-agile col-xl">
            <div class="work-progres">
                <h4 class="tittle-w3-agileits mb-4">Recent Followers</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Manager</th>

                                <th>Status</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Face book</td>
                                <td>Alexander</td>

                                <td>
                                    <span class="badge badge-danger">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-primary">70%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Twitter</td>
                                <td>Lucika adam</td>

                                <td>
                                    <span class="badge badge-success">completed</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-primary">80%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Google</td>
                                <td>Michael</td>

                                <td>
                                    <span class="badge badge-warning">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info">30%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>LinkedIn</td>
                                <td>Chris dany</td>

                                <td>
                                    <span class="badge badge-info">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-secondary">55%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Tumblr</td>
                                <td>Jacob velly</td>

                                <td>
                                    <span class="badge badge-warning">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-primary">75%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tesla</td>
                                <td>Donald chris</td>

                                <td>
                                    <span class="badge badge-info">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info">25%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Behance</td>
                                <td>alexa louis</td>

                                <td>
                                    <span class="badge badge-info">in progress</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-success">100%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</section>
<? $this->view("admin/footer"); ?>