@extends('package-intership::admin.dashboard')
@section('content-dashboard')
<div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-md">
                        <div class="navbar-brand" href="#">Diaries</div>
                        <a href="./create_update_diary.html" class="btn btn-primary btn-sm ml-auto" type="button">Add Diary</a>
                    </nav>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Diary Name</th>
                                            <th>User Name</th>
                                            <th>Weeks</th>
                                            <th>Status</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="./weeks.html"><span>Diary 1</span></a></td>
                                            <td>Pham Hoang Anh</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" checked /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href=""><span>Diary 2</span></a></td>
                                            <td>Vu Minh Chuan</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href=""><span>Diary 3</span></a></td>
                                            <td>Truong Minh Hieu</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" checked /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href=""><span>Diary 4</span></a></td>
                                            <td>Pham Van Loc</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href=""><span>Diary 5</span></a></td>
                                            <td>Dang Thanh Nguyen</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" checked /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href=""><span>Diary 6</span></a></td>
                                            <td>Dao Xuan Son</td>
                                            <td class=" dropdown no-arrow mx-1">
                                                <div class=" dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                        aria-expanded="false" data-toggle="dropdown" href="#">Weeks</a>
                                                    <div class="dropdown-menu">
                                                        <h6 class="dropdown-header">Weeks</h6>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 1</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 2</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="./diaries_contents.html">
                                                            <div class="font-weight-bold">
                                                                <div class="text-truncate"><span>Week Weekday 3</span>
                                                                </div>
                                                                <p class="small text-gray-500 mb-0">29/06/2021</p>
                                                                <p class="small text-gray-500 mb-0">30/06/2021</p>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item text-center small text-gray-500"
                                                            href="./weeks.html">Show All Weeks</a>
                                                    </div>
                                                </div>
                                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="alertsDropdown"></div>
                                            </td>
                                            <td><input type="checkbox" /></td>
                                            <td>
                                                <a class="px-2" href="./create_update_diary.html"><span class="fas fa-pencil-alt"></span></a>
                                                <a class="px-2" href=""><span class="fas fa-trash-alt"></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Diary Name</strong></td>
                                            <td><strong>User Name</strong></td>
                                            <td><strong>Weeks</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Operations</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                        aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection