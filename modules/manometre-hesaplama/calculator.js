function hcManometreSiviGuncelle() {
    const fluid = document.getElementById('hc-mn-fluid').value;
    const customGroup = document.getElementById('hc-mn-custom-rho-group');
    customGroup.style.display = (fluid === 'custom') ? 'block' : 'none';
}

function hcManometreHesapla() {
    const h_mm = parseFloat(document.getElementById('hc-mn-height').value);
    const fluidSelect = document.getElementById('hc-mn-fluid').value;
    
    let rho;
    if (fluidSelect === 'custom') {
        rho = parseFloat(document.getElementById('hc-mn-rho').value);
    } else {
        rho = parseFloat(fluidSelect);
    }

    if (isNaN(h_mm) || isNaN(rho) || rho <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const g = 9.80665;
    const h_m = h_mm / 1000;

    // ΔP = ρ * g * h
    const dp_pa = rho * g * h_m;
    const dp_bar = dp_pa / 100000;

    document.getElementById('hc-mn-res-pa').innerText = Math.round(dp_pa).toLocaleString('tr-TR');
    document.getElementById('hc-mn-res-bar').innerText = dp_bar.toLocaleString('tr-TR', { maximumFractionDigits: 5 });

    document.getElementById('hc-mn-result').classList.add('visible');
}
