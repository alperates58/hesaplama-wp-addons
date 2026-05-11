function hcRamHesapla() {
    const users = parseInt(document.getElementById('hc-ram-users').value);
    const perUser = parseFloat(document.getElementById('hc-ram-per-user').value);
    const osBase = parseFloat(document.getElementById('hc-ram-os').value);

    if (isNaN(users) || isNaN(perUser) || isNaN(osBase) || users < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const appRamGb = (users * perUser) / 1024;
    const minRam = appRamGb + osBase;
    const recRam = Math.ceil(minRam * 1.25); // %25 emniyet payı

    document.getElementById('hc-ram-res-total').innerText = minRam.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-ram-res-rec').innerText = recRam.toLocaleString('tr-TR');

    document.getElementById('hc-ram-result').classList.add('visible');
}
