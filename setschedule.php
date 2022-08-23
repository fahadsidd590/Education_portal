<?php require_once('./component/Navbar.php') ?>

<div class="row container">
    <div class="col-12">
        <h2>
            Your Schedule
        </h2>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><button class="btn btn-success"> Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><button class="btn btn-success"> Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td class="">Larry the Bird</td>
                    <td>ooottt</td>
                    <td>@twitter</td>
                    <td><button class="btn btn-success"> Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Add your Schedule</h3>
        <form action="./setschedule.php" method="POST">
            <div class="col-12">
                <label for="exampleDataList" class="form-label">Select the subject</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                </datalist>
            </div>
            <div class="col-12 ">
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="show_time(0)" name="days[]" value="Monday" id="Monday">
                            <label class="form-check-label" for="Monday">
                                Monday
                            </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  onclick="show_time(1)" name="days[]" value="Tuesday" id="Tuesday">
                            <label class="form-check-label" for="Tuesday">
                                Tuesday
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="show_time(2)" name="days[]" value="Wednesday" id="Wednesday">
                            <label class="form-check-label" for="Wednesday">
                                Wednesday
                            </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="show_time(3)" name="days[]" value="Thursday" id="Thursday">
                            <label class="form-check-label" for="Thursday">
                                Thursday
                            </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="show_time(4)" name="days[]" value="Friday" id="Friday">
                            <label class="form-check-label" for="Friday">
                                Friday
                            </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="show_time(5)" name="days[]" value="Saturday" id="Saturday">
                            <label class="form-check-label" for="Saturday">
                                Saturday
                            </label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="time">
                            <label for="appt">Starting time</label>
                            <input type="time" id="appt" name="start-time[]" min="09:00" max="18:00">
                            <label for="appt">End time</label>
                            <input type="time" id="appt" name="end-time[]" min="09:00" max="18:00">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="add_schedule" value="Add Schedule">

        </form>

    </div>
</div>



<script>
    function show_time(j) {
        let time = document.getElementsByClassName("time");
        if (time[j].style.display == "none") {
            time[j].style.display = "block"
        } else if (time[j].style.display == "block") {
            time[j].style.display = "none";
        }
        else if (time[j].style.display == "") {
            time[j].style.display = "block";
        }
    }
</script>