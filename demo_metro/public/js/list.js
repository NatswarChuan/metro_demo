var xhttpRouteListList = new XMLHttpRequest();
var xhttpRouteList = new XMLHttpRequest();

xhttpRouteList.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var response = this.responseText;

    const route = JSON.parse(response).data;

    document.querySelector(`.route-wrapper`).innerHTML = `<div class="route-name rounded-pill d-inline-block"></div>
        <div class="route card-body">
        <div class="row radio"></div>
        <div class="row name"></div>
    </div>
    <div class="card-footer text-center">
        <span class="badge rounded-pill text-bg-secondary otp_time"></span>

        <span class="badge rounded-pill text-bg-secondary length"></span>
    </div>`

    document.querySelector(`.route-name`).innerHTML = route.name;

    document.querySelector(`.otp_time`).innerHTML = '<i class="fa-solid fa-clock"></i> ' + route.opt_time

    document.querySelector(`.length`).innerHTML = '<i class="fa-solid fa-arrows-left-right-to-line"></i> ' + route.length + "km"

    route.stations.forEach(station => {
      const routeRowRadio = document.querySelector('.route > .row.radio');
      const routeRowName = document.querySelector('.route > .row.name');


      const routeRadioElement = document.createElement('input');
      const routeNameElement = document.createElement('div');

      const badgeText = [];
      station.routes.forEach(ele => {
        badgeText.push(` <span class='badge text-bg-light'>${ele.route_id}</span>`)
      });

      routeRadioElement.type = 'radio';
      routeRadioElement.name = `route-${route.route_id}`;
      routeRadioElement.classList = 'col station-dot';
      routeRadioElement.id = `sta-${station.station_id}`;
      routeRadioElement.setAttribute('data-bs-toggle', "tooltip")
      routeRadioElement.setAttribute('data-bs-custom-class', "route-tooltip")
      routeRadioElement.setAttribute('data-bs-html', "true")
      routeRadioElement.setAttribute('data-bs-title', `Tuyến${badgeText.join(" ")}`)

      routeNameElement.classList = "col station-name";
      routeNameElement.innerHTML = `<label for="sta-${station.station_id}">${station.name}</label>`


      routeRowRadio.appendChild(routeRadioElement)
      routeRowName.appendChild(routeNameElement)

      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    });
    // Xử lý kết quả trả về từ server
  }
};

xhttpRouteListList.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var response = this.responseText;

    const container = document.querySelector('.container-fluid');
    const list = JSON.parse(response);

    const element = document.createElement('div');
    list.forEach(e => {
      element.className = `route-wrapper-1 cart mt-5 d-flex justify-content-center`;

      const routeNameElement = document.createElement('div');
      routeNameElement.className = `route-name-list rounded-pill mx-2`;
      routeNameElement.innerHTML = e.name

      routeNameElement.addEventListener('click', () => {
        xhttpRouteList.open("GET", `http://127.0.0.1:8000/api/route/${e.route_id}`, true);
        xhttpRouteList.send();
      })

      element.appendChild(routeNameElement);
    });

    container.prepend(element);
    // Xử lý kết quả trả về từ server
  }
};

xhttpRouteListList.open("GET", "http://127.0.0.1:8000/api/routes/name", true);
xhttpRouteListList.send();