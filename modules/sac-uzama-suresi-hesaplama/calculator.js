function hcHairGrowthHesapla() {
    const current = parseFloat(document.getElementById('hc-hair-current').value) || 0;
    const target = parseFloat(document.getElementById('hc-hair-target').value) || 0;

    if (target <= current) {
        alert('Hedef uzunluk mevcut uzunluktan büyük olmalıdır.');
        return;
    }

    const diff = target - current;
    const months = diff / 1.25;

    let res = "";
    if (months >= 12) {
        const years = Math.floor(months / 12);
        const remMonths = Math.round(months % 12);
        res = years + " Yıl " + remMonths + " Ay";
    } else {
        res = Math.round(months) + " Ay";
    }

    document.getElementById('hc-res-hair-time').innerText = res;
    document.getElementById('hc-hair-growth-result').classList.add('visible');
}
