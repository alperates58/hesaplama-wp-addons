function hcAddShampooIngredient() {
    const container = document.getElementById('hc-sa-ingredients');
    const div = document.createElement('div');
    div.className = 'hc-form-group hc-sa-row';
    div.innerHTML = `
        <input type="text" placeholder="Sürfaktan Adı" style="width:40%">
        <input type="number" class="hc-sa-percent" placeholder="Kullanım %" style="width:28%">
        <input type="number" class="hc-sa-active" placeholder="Aktiflik %" style="width:28%">
    `;
    container.appendChild(div);
}

function hcŞampuanAktifMaddeOranıHesapla() {
    const usage = document.querySelectorAll('.hc-sa-percent');
    const active = document.querySelectorAll('.hc-sa-active');
    
    let totalASM = 0;

    usage.forEach((u, idx) => {
        let uVal = parseFloat(u.value) / 100;
        let aVal = parseFloat(active[idx].value) / 100;
        if (!isNaN(uVal) && !isNaN(aVal)) {
            totalASM += (uVal * aVal);
        }
    });

    const asmPercent = totalASM * 100;
    document.getElementById('hc-sa-val').innerText = '% ' + asmPercent.toFixed(2);
    
    let desc = "";
    if (asmPercent < 10) desc = "Yumuşak (Bebek/Günlük) Şampuan";
    else if (asmPercent < 15) desc = "Standart Şampuan";
    else desc = "Derin Temizleyici Şampuan";

    document.getElementById('hc-sa-desc').innerText = desc;
    document.getElementById('hc-sa-result').classList.add('visible');
}
