import { IconButton } from '@chakra-ui/react'

const ButtonIconHandles = ({
  docs=[],
  reload = false,
  size = 'sm',
  colorScheme = 'red',
  icon = null,
  variant = 'ghost',
  isRound = true,
  handleClick,
}) => {
  return (
    <IconButton
      isLoading={reload}
      size={size}
      colorScheme={colorScheme}
      icon={icon}
      variant={variant}
      isRound={isRound}
      onClick={handleClick}
    />
  )
}

export default ButtonIconHandles
