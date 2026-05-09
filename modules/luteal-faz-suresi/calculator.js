function hcLutealHesapla() {
    const cycle = parseInt(document.getElementById('hc-lf-cycle').value);
    const ovul = parseInt(document.getElementById('hc-lf-ovul').value);

    if (isNaN(cycle) || isNaN(ovul) || ovul >= cycle) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const lf = cycle - ovul;
    document.getElementById('hc-lf-value').innerText = lf + " Gün";

    const status = document.getElementById('hc-lf-status');
    if (lf < 10) {
        status.innerText = "Süre Kısa (Doktorunuza danışmanız önerilir).";
        status.style.color = "#c62828";
    } else if (lf <= 16) {
        status.innerText = "İdeal Süre.";
        status.style.color = "#2e7d32";
    } else {
        status.innerText = "Süre Uzun.";
        status.style.color = "#ef6c00";
    }

    document.getElementById('hc-luteal-faz-result').classList.add('visible');
}
