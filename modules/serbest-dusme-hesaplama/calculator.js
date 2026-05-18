function hcSerbestDusmeModDegisti() {
    var mode = document.getElementById('hc-sd-mode').value;
    if (mode === 'time') {
        document.getElementById('hc-sd-time-group').style.display = 'block';
        document.getElementById('hc-sd-height-group').style.display = 'none';
    } else {
        document.getElementById('hc-sd-time-group').style.display = 'none';
        document.getElementById('hc-sd-height-group').style.display = 'block';
    }
}

function hcSerbestDusmeHesapla() {
    var mode = document.getElementById('hc-sd-mode').value;
    var g = parseFloat(document.getElementById('hc-sd-g').value);
    var mass = parseFloat(document.getElementById('hc-sd-mass').value);

    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi girin.');
        return;
    }

    var time = 0;
    var height = 0;
    var velocity = 0;

    if (mode === 'time') {
        time = parseFloat(document.getElementById('hc-sd-time').value);
        if (isNaN(time) || time < 0) {
            alert('Lütfen geçerli bir süre girin.');
            return;
        }
        // h = 0.5 * g * t^2
        height = 0.5 * g * Math.pow(time, 2);
        // v = g * t
        velocity = g * time;
    } else {
        height = parseFloat(document.getElementById('hc-sd-height').value);
        if (isNaN(height) || height < 0) {
            alert('Lütfen geçerli bir yükseklik girin.');
            return;
        }
        // t = sqrt(2h / g)
        time = Math.sqrt((2 * height) / g);
        // v = sqrt(2gh)
        velocity = Math.sqrt(2 * g * height);
    }

    var velocityKmh = velocity * 3.6;

    document.getElementById('hc-sd-res-time').innerText = time.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' s';
    document.getElementById('hc-sd-res-height').innerText = height.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-sd-res-v-ms').innerText = velocity.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    document.getElementById('hc-sd-res-v-kmh').innerText = velocityKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';

    var energyRow = document.getElementById('hc-sd-energy-row');
    if (!isNaN(mass) && mass > 0) {
        // Ek = 0.5 * m * v^2
        var Ek = 0.5 * mass * Math.pow(velocity, 2);
        document.getElementById('hc-sd-res-energy').innerText = Ek.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' J';
        energyRow.style.display = 'flex';
    } else {
        energyRow.style.display = 'none';
    }

    document.getElementById('hc-serbest-dusme-hesaplama-result').classList.add('visible');
}
