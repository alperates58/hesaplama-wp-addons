function hcBoatTab(tab) {
    document.querySelectorAll('.hc-tab-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.hc-tab-content').forEach(content => content.classList.remove('active'));
    
    if (tab === 'hull') {
        document.querySelector('[onclick="hcBoatTab(\'hull\')"]').classList.add('active');
        document.getElementById('hc-boat-hull').classList.add('active');
    } else {
        document.querySelector('[onclick="hcBoatTab(\'conv\')"]').classList.add('active');
        document.getElementById('hc-boat-conv').classList.add('active');
    }
}

function hcDisplayBoatResults(knots) {
    document.getElementById('hc-res-knots').innerText = knots.toFixed(1);
    document.getElementById('hc-res-kmh').innerText = (knots * 1.852).toFixed(1);
    document.getElementById('hc-res-mph').innerText = (knots * 1.15078).toFixed(1);
    
    document.getElementById('hc-boat-result').classList.add('visible');
    document.getElementById('hc-boat-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function hcCalcHullSpeed() {
    let lwl = parseFloat(document.getElementById('hc-lwl-val').value);
    const unit = document.getElementById('hc-lwl-unit').value;

    if (isNaN(lwl) || lwl <= 0) {
        alert('Lütfen geçerli bir su hattı boyu giriniz.');
        return;
    }

    // Metreyi Feet'e çevir (Hull speed formülü feet üzerinden 1.34 katsayısını kullanır)
    if (unit === 'm') {
        lwl = lwl * 3.28084;
    }

    const hullSpeedKnots = 1.34 * Math.sqrt(lwl);
    hcDisplayBoatResults(hullSpeedKnots);
}

function hcConvertBoatSpeed() {
    const val = parseFloat(document.getElementById('hc-speed-val').value);
    const unit = document.getElementById('hc-speed-unit').value;

    if (isNaN(val) || val <= 0) {
        alert('Lütfen geçerli bir hız değeri giriniz.');
        return;
    }

    let knots;
    if (unit === 'knots') {
        knots = val;
    } else if (unit === 'kmh') {
        knots = val / 1.852;
    } else if (unit === 'mph') {
        knots = val / 1.15078;
    }

    hcDisplayBoatResults(knots);
}
