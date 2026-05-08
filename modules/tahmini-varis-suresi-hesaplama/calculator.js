function hcEtaHesapla() {
    const dist = parseFloat(document.getElementById('hc-eta-dist').value);
    const speed = parseFloat(document.getElementById('hc-eta-speed').value);

    if (isNaN(dist) || isNaN(speed) || speed === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const totalHours = dist / speed;
    const hours = Math.floor(totalHours);
    const minutes = Math.round((totalHours - hours) * 60);

    const now = new Date();
    const arrival = new Date(now.getTime() + (totalHours * 3600000));

    document.getElementById('hc-eta-time').innerText = hours + " sa " + minutes + " dk";
    document.getElementById('hc-eta-arrival').innerText = arrival.toLocaleTimeString('tr-TR', { hour: '2-digit', minute: '2-digit' });

    document.getElementById('hc-eta-result').classList.add('visible');
}
