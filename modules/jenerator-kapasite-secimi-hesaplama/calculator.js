function hcGSEkle() {
    const container = document.getElementById('hc-gs-loads');
    const row = document.createElement('div');
    row.className = 'hc-gs-row';
    row.innerHTML = `
        <input type="text" placeholder="Cihaz Adı" class="hc-gs-name">
        <input type="number" placeholder="Watt" class="hc-gs-watt">
        <select class="hc-gs-type">
            <option value="1">Rezistif (Lamba, Isıtıcı)</option>
            <option value="3">Endüktif (Motor, Klima)</option>
        </select>
        <button onclick="this.parentElement.remove()" class="hc-gs-remove">×</button>
    `;
    container.appendChild(row);
}

function hcJenKapasiteHesapla() {
    const watts = document.querySelectorAll('.hc-gs-watt');
    const types = document.querySelectorAll('.hc-gs-type');

    let totalRunningWatt = 0;
    let maxStartingWatt = 0;

    for (let i = 0; i < watts.length; i++) {
        const w = parseFloat(watts[i].value) || 0;
        const multiplier = parseFloat(types[i].value);
        
        totalRunningWatt += w;
        
        // Starting load is usually the largest motor's startup + other running loads
        // Simplified: Sum of running loads + (Largest Inductive Watt * (Multiplier - 1))
        const startingIncr = w * (multiplier - 1);
        if (startingIncr > maxStartingWatt) maxStartingWatt = startingIncr;
    }

    const totalStartingWatt = totalRunningWatt + maxStartingWatt;
    const powerFactor = 0.8;
    
    // kVA = kW / cosPhi
    // Safety margin 20%
    const requiredKva = (totalStartingWatt / 1000 / powerFactor) * 1.2;

    document.getElementById('hc-res-gs-load').innerText = (totalRunningWatt / 1000).toFixed(2) + ' kW';
    document.getElementById('hc-res-gs-start').innerText = (totalStartingWatt / 1000).toFixed(2) + ' kW';
    document.getElementById('hc-res-gs-rec').innerText = Math.ceil(requiredKva) + ' kVA';

    document.getElementById('hc-gs-result').classList.add('visible');
}
