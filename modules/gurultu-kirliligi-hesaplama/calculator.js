function hcAddNoiseInput() {
    const container = document.getElementById('hc-noise-inputs');
    const count = container.querySelectorAll('.hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>Ses Kaynağı ${count} (dB)</label><input type="number" class="hc-noise-val" placeholder="Örn: 60">`;
    container.appendChild(div);
}

function hcGürültüKirliliğiHesapla() {
    const inputs = document.querySelectorAll('.hc-noise-val');
    let sumPowers = 0;
    
    inputs.forEach(input => {
        const db = parseFloat(input.value);
        if (!isNaN(db)) {
            // Desibel logaritmiktir: L_total = 10 * log10(sum(10^(Li/10)))
            sumPowers += Math.pow(10, db / 10);
        }
    });

    if (sumPowers === 0) return;

    const totalDb = 10 * Math.log10(sumPowers);

    document.getElementById('hc-noise-val').innerText = totalDb.toFixed(1) + ' dB';

    let level = "Güvenli";
    let color = "#27ae60";

    if (totalDb > 120) { level = "Ağrı Eşiği (Tehlikeli)"; color = "#c0392b"; }
    else if (totalDb > 85) { level = "İşitme Kaybı Riski"; color = "#e67e22"; }
    else if (totalDb > 65) { level = "Rahatsız Edici"; color = "#f1c40f"; }

    const levelEl = document.getElementById('hc-noise-level');
    levelEl.innerText = level;
    levelEl.style.color = color;
    document.getElementById('hc-noise-result').classList.add('visible');
}
