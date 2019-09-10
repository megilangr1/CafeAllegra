CRE ATE
VIEW v_gpr2
AS
SELECT
  ref_gmat2.FK_GPR1, ref_gpr1.FN_GPR1, ref_gpr2.FK_GPR2, ref_gpr2.FN_GPR2
FROM ref_gpr2
  INNER JOIN ref_gpr1 ON ref_gpr1.FK_GPR1=ref_gpr2.FK_GPR1;

-- CREATE VIEW v_gmat2
-- AS
--   SELECT
--     ref_gmat2.FK_GMAT1, ref_gmat1.FN_GMAT1, ref_gmat2.FK_GMAT2, ref_gmat2.FN_GMAT2
--   FROM ref_gmat2
--     INNER JOIN ref_gmat1 ON ref_gmat1.FK_GMAT1=ref_gmat2.FK_GMAT1

CREATE VIEW v_rls_mat_sup
AS
  SELECT rls_mat_sup.FK_SUP, rls_mat_sup.FK_MAT, m_mat.FN_MAT, m_mat.FSAT, m_mat.FSTOK_MIN, m_mat.FSTOK_MAX, rls_mat_sup.FHARGA, rls_mat_sup.FN_MAT_SUP
  FROM rls_mat_sup
    INNER JOIN m_mat ON m_mat.FK_MAT=rls_mat_sup.FK_MAT

SELECT 
  h_beli.FNO_BELI, h_beli.FTGL_BELI, h_beli.FK_SUP, m_sup.FNA_SUP, m_sup.FALAMAT, m_sup.FKOTA, m_sup.FTEL,
  m_sup.FCP, m_sup.FLAMA_BAYAR, m_sup.FPENERIMA, m_sup.FBANK, m_sup.FNO_ACC, h_beli.FHC, t_beli.FK_MAT, m_mat.FN_MAT,
  m_mat.FSAT, m_mat.FSTOK_MIN, m_mat.FSTOK_MAX, t_beli.FQTY, t_beli.FHARGA, SUM(t_beli.FQTY*t_beli.FHARGA) as SUBTOTAL
  FROM h_beli
    INNER JOIN m_sup ON m_sup.FK_SUP = h_beli.FK_SUP
    INNER JOIN t_beli ON t_beli.FNO_BELI = h_beli.FNO_BELI
    INNER JOIN m_mat ON m_mat.FK_MAT = t_beli.FK_MAT


CREATE VIEW v_beli AS
SELECT 
  h_beli.FNO_BELI, h_beli.FTGL_BELI, h_beli.FK_SUP, m_sup.FNA_SUP, m_sup.FALAMAT, m_sup.FKOTA, m_sup.FTEL,
  m_sup.FCP, m_sup.FLAMA_BAYAR, m_sup.FPENERIMA, m_sup.FBANK, m_sup.FNO_ACC, h_beli.FHC, t_beli.FK_MAT, m_mat.FN_MAT,
  m_mat.FSAT, m_mat.FSTOK_MIN, m_mat.FSTOK_MAX, t_beli.FQTY, t_beli.FHARGA
  FROM h_beli
    INNER JOIN m_sup ON m_sup.FK_SUP = h_beli.FK_SUP
    INNER JOIN t_beli ON t_beli.FNO_BELI = h_beli.FNO_BELI
    INNER JOIN m_mat ON m_mat.FK_MAT = t_beli.FK_MAT 