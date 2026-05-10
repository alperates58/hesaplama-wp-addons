function hcAddLoadSet() {
    const container = document.getElementById('hc-load-sets-container');
    const div = document.createElement('div');
    div.className = 'hc-load-set';
    div.innerHTML = `
        <input type="number" class="hc-load-weight" placeholder="Ağırlık (kg)" step="0.5">
        <input type="number" class="hc-load-reps" placeholder="Tekrar">
        <input type="number" class="hc-load-sets" placeholder="Set" value="1">
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:red; cursor:pointer;">✕</button>
    `;
    container.appendChild(div);
}

function hcAntrenmanYukuHesapla() {
    const weights = document.querySelectorAll('.hc-load-weight');
    const reps = document.querySelectorAll('.hc-load-reps');
    const sets = document.querySelectorAll('.hc-load-sets');

    let totalVolume = 0;
    let totalReps = 0;

    for (let i = 0; i < weights.length; i++) {
        const w = parseFloat(weights[i].value) || 0;
        const r = parseInt(reps[i].value) || 0;
        const s = parseInt(sets[i].value) || 0;
        
        totalVolume += w * r * s;
        totalReps += r * s;
    }

    document.getElementById('hc-load-val').innerText = totalVolume.toLocaleString('tr-TR') + ' kg';
    document.getElementById('hc-load-stats').innerText = `Toplam ${totalReps} tekrar yapıldı.`;
    document.getElementById('hc-load-result').classList.add('visible');
}
