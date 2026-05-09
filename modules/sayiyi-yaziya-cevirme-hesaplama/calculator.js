function hcNumToTextHesapla() {
    let num = document.getElementById('hc-nt-input').value;
    if (num === "") return;
    num = parseInt(num);

    const units = ["", "bir", "iki", "üç", "dört", "beş", "altı", "yedi", "sekiz", "dokuz"];
    const tens = ["", "on", "yirmi", "otuz", "kırk", "elli", "altmış", "yetmiş", "seksen", "doksan"];
    const scales = ["", "bin", "milyon", "milyar", "trilyon"];

    if (num === 0) {
        document.getElementById('hc-res-nt-val').innerText = "sıfır";
        document.getElementById('hc-num-to-text-result').classList.add('visible');
        return;
    }

    function convertTriple(n) {
        let res = "";
        let h = Math.floor(n / 100);
        let t = Math.floor((n % 100) / 10);
        let u = n % 10;

        if (h > 0) {
            if (h > 1) res += units[h];
            res += "yüz";
        }
        if (t > 0) res += tens[t];
        if (u > 0) res += units[u];
        return res;
    }

    let text = "";
    let step = 0;
    while (num > 0) {
        let triple = num % 1000;
        if (triple > 0) {
            let tripleText = convertTriple(triple);
            if (step === 1 && triple === 1) tripleText = ""; // "bir bin" değil "bin"
            text = tripleText + scales[step] + text;
        }
        num = Math.floor(num / 1000);
        step++;
    }

    document.getElementById('hc-res-nt-val').innerText = text.trim();
    document.getElementById('hc-num-to-text-result').classList.add('visible');
}
