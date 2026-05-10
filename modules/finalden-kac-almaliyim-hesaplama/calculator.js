function hcExamCalcHesapla() {
    const vize = parseFloat(document.getElementById('hc-ex-vize').value);
    const vizeW = parseFloat(document.getElementById('hc-ex-vize-weight').value) / 100;
    const pass = parseFloat(document.getElementById('hc-ex-pass').value);

    if (isNaN(vize) || isNaN(vizeW) || isNaN(pass)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const finalW = 1 - vizeW;
    const needed = (pass - (vize * vizeW)) / finalW;

    const resVal = document.getElementById('hc-ex-res-val');
    const resMsg = document.getElementById('hc-ex-res-msg');

    if (needed <= 0) {
        resVal.innerText = "0";
        resMsg.innerText = "Final sınavına girmeseniz bile geçiyorsunuz!";
        resMsg.style.color = "#27ae60";
    } else if (needed > 100) {
        resVal.innerText = needed.toFixed(1);
        resMsg.innerText = "Maalesef 100 alsanız bile geçemiyorsunuz.";
        resMsg.style.color = "#e74c3c";
    } else {
        resVal.innerText = Math.ceil(needed);
        resMsg.innerText = "Başarılar dileriz!";
        resMsg.style.color = "var(--hc-primary)";
    }

    document.getElementById('hc-exam-result').classList.add('visible');
}
