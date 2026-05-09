function hcSwitchTab(tab) {
    document.querySelectorAll('.hc-tab-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.hc-tab-content').forEach(content => content.classList.remove('active'));
    
    if (tab === 'torque') {
        document.querySelector('[onclick="hcSwitchTab(\'torque\')"]').classList.add('active');
        document.getElementById('hc-torque-tab').classList.add('active');
    } else {
        document.querySelector('[onclick="hcSwitchTab(\'kw\')"]').classList.add('active');
        document.getElementById('hc-kw-tab').classList.add('active');
    }
}

function hcBeygirHesaplaTork() {
    const tork = parseFloat(document.getElementById('hc-tork').value);
    const rpm = parseFloat(document.getElementById('hc-rpm').value);

    if (isNaN(tork) || isNaN(rpm) || tork <= 0 || rpm <= 0) {
        alert('Lütfen geçerli tork ve devir değerleri giriniz.');
        return;
    }

    // Beygir (PS) = (Tork (Nm) * RPM) / 7023.5 (Yaklaşık Metric HP)
    // Standart formula: (Nm * RPM) / 9549 = kW -> kW * 1.35962 = PS
    const kw = (tork * rpm) / 9549;
    const ps = kw * 1.35962;

    document.getElementById('hc-res-primary').innerText = ps.toFixed(1) + " HP (PS)";
    document.getElementById('hc-res-secondary').innerText = kw.toFixed(1) + " kW";

    document.getElementById('hc-beygir-result').classList.add('visible');
}

function hcBeygirDonustur() {
    const val = parseFloat(document.getElementById('hc-input-val').value);
    const type = document.getElementById('hc-conv-type').value;

    if (isNaN(val) || val <= 0) {
        alert('Lütfen geçerli bir değer giriniz.');
        return;
    }

    let primary, secondary;
    if (type === 'kw-to-hp') {
        const ps = val * 1.35962;
        primary = ps.toFixed(1) + " HP (PS)";
        secondary = val.toFixed(1) + " kW";
    } else {
        const kw = val / 1.35962;
        primary = val.toFixed(1) + " HP (PS)";
        secondary = kw.toFixed(1) + " kW";
    }

    document.getElementById('hc-res-primary').innerText = primary;
    document.getElementById('hc-res-secondary').innerText = secondary;

    document.getElementById('hc-beygir-result').classList.add('visible');
}
