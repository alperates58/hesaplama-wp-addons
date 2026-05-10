function hcBisikletKadansHesapla() {
    const speed = parseFloat(document.getElementById('hc-bike-speed-input').value);
    const front = parseFloat(document.getElementById('hc-bike-front-input').value);
    const rear = parseFloat(document.getElementById('hc-bike-rear-input').value);
    const circ = parseFloat(document.getElementById('hc-bike-tire-input').value);

    if (!speed || !front || !rear || !circ) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const ratio = front / rear;
    // Cadence = (Speed * 1,000,000) / (Ratio * Circumference * 60)
    const cad = (speed * 1000000) / (ratio * circ * 60);

    document.getElementById('hc-bike-cad-val').innerText = Math.round(cad) + ' RPM';
    
    let comment = "";
    if (cad < 70) comment = "Düşük kadans; dizlerinize fazla yük binebilir.";
    else if (cad <= 100) comment = "İdeal verimlilik aralığı.";
    else comment = "Yüksek kadans; kardiyovasküler sisteminiz daha çok zorlanacaktır.";

    document.getElementById('hc-bike-cad-comment').innerText = comment;
    document.getElementById('hc-bike-cad-result').classList.add('visible');
}
