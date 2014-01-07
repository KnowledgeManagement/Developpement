USE [m5f]
GO
/****** Object:  UserDefinedFunction [dbo].[MD5]    Script Date: 07/01/2014 10:41:25 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION dbo.MD5
(
	@value varchar(255)
)
RETURNS varchar(32)
AS
BEGIN
  RETURN SUBSTRING(sys.fn_sqlvarbasetostr(HASHBYTES('MD5', @value)),3,32);
END