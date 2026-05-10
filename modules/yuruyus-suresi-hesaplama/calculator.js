function hcWalkTimeHesapla() {
    const dist = parseFloat(document.getElementById('hc-wt-dist').value);
    const speed = parseFloat(document.getElementById('hc-wt-speed').value);

    if (!dist) {
        alert('Lütfen mesafeyi giriniz.');
        return;
    }

    const totalHours = dist / speed;
    const h = Math.floor(totalHours);
    const m = Math.round((totalHours - h) * 60);

    const resVal = document.getElementById('hc-wt-res-val');
    resVal.innerText = `${h}:${m < 10 ? '0' + m : m}`;

    document.getElementById('hc-walk-time-result').classList.add('visible');
}
