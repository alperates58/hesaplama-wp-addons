function hcOeeHesapla() {
    const planned = parseFloat(document.getElementById('hc-oee-planned').value);
    const downtime = parseFloat(document.getElementById('hc-oee-downtime').value);
    const ideal = parseFloat(document.getElementById('hc-oee-ideal').value);
    const total = parseFloat(document.getElementById('hc-oee-total').value);
    const defects = parseFloat(document.getElementById('hc-oee-defects').value);

    if (isNaN(planned) || isNaN(downtime) || isNaN(ideal) || isNaN(total) || isNaN(defects) || planned <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    const runTime = planned - downtime;
    if (runTime <= 0) { alert('Duruş süresi planlanan süreden büyük olamaz.'); return; }

    // 1. Availability = Run Time / Planned Production Time
    const availability = runTime / planned;

    // 2. Performance = (Ideal Cycle Time * Total Count) / Run Time
    // Convert ideal s/unit to min/unit for consistency
    const idealMin = ideal / 60;
    const performance = (idealMin * total) / runTime;

    // 3. Quality = (Total - Defects) / Total
    const quality = total > 0 ? (total - defects) / total : 0;

    // OEE = A * P * Q
    const oee = availability * performance * quality * 100;

    document.getElementById('hc-oee-res-avail').innerText = (availability * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-oee-res-perf').innerText = (performance * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-oee-res-qual').innerText = (quality * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-oee-res-total').innerText = oee.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    document.getElementById('hc-oee-result').classList.add('visible');
}
