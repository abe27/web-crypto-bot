import React, { useState } from 'react'
import { IconButton, Button } from '@chakra-ui/react'
import { RepeatIcon } from '@chakra-ui/icons'

const ButtonIconReload = ({ size = 'sm', colorScheme = 'teal', handleClick=false }) => {
  const [reload, setReload] = useState(false)

  const ReloadData = (e) => {
    console.log('btn click');
    setReload(true)
    setTimeout(() => {
      setReload(false)
      handleClick(e);
    }, 3000)
  }

  return (
    <IconButton
      isLoading={reload}
      size={size}
      colorScheme={colorScheme}
      icon={<RepeatIcon />}
      onClick={ReloadData}
    />
  )
}

export default ButtonIconReload
